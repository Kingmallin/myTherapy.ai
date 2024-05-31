<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('admin.therapist.{uuid}.{therapistId}', function ($admin, $uuid, $therapistId) {
    // Check if the authenticated user is an admin and if the UUID matches
    return $admin->uuid === $uuid;
});

Broadcast::channel('user.therapist.{uuid}.{therapistId}', function ($user, $uuid, $therapistId) {
    // Check if the authenticated user UUID matches
    return $user->uuid === $uuid;
});

Broadcast::channel('test', function () {
    return true;
});
