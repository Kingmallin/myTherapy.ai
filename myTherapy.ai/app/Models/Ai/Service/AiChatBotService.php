<?php

namespace App\Models\Ai\Service;

use App\Models\Ai\Provider\OpenAiProvider;
use App\Models\Ai\Repository\AiConversationRepository;
use App\Models\Therapist\Therapist;
use Illuminate\Support\Facades\Log;

class AiChatBotService
{
    private $openAiProvider;
    private $aiConversationRepository;
    private $therapist;

    public function __construct(Therapist $therapist, AiConversationRepository $aiConversationRepository)
    {
        Log::info('bot service constructed');
        $this->therapist = $therapist;
        $this->aiConversationRepository = $aiConversationRepository;
        $this->openAiProvider = new OpenAiProvider($therapist->getApiKey(), $therapist->getApiEndpoint());
    }

    private function getChatHistory($user, $admin)
    {
        Log::info('getting History');
        $conversations = $this->aiConversationRepository->findByUserAdmin($user, $admin);
        $chatHistory = [];

        foreach ($conversations as $conversation) {
            $chatHistory[] = [
                'role' => $conversation->getSender() === 'user' ? 'user' : 'assistant',
                'content' => $conversation->getMessage()
            ];
        }
        log::info(['chat history' => $chatHistory]);
        return $chatHistory;
    }

    private function preparePayload($chatHistory)
    {
        Log::info('preping data');
        // Extract the latest user message
        $latestUserMessage = end($chatHistory)['content'];
        
        // Construct the payload
        return [
            'model' => 'gpt-3.5-turbo-0301',
            'messages' => array_merge(
                [[
                    'role' => 'system',
                    'content' => 'Tou are ' . $this->therapist->getName() . ', ' . $this->therapist->getPersona()
                    ]],
                $chatHistory,
            )
        ];
    }

    public function makeApiCall($user, $admin)
    {
        $chatHistory = $this->getChatHistory($user, $admin);
        $payload = $this->preparePayload($chatHistory);
        Log::info('callin Ai');
        return $this->openAiProvider->callOpenAiApi($payload);
    }
}
