import { ref } from 'vue';

export const isVisible = ref(false);
export const message = ref('');
export const header = ref('');
let acceptCallback = () => {};
let rejectCallback = () => {};

export function useConfirm() {
  const openConfirmation = (msg, hdr, onAccept, onReject) => {
    message.value = msg;
    header.value = hdr;
    acceptCallback = onAccept;
    rejectCallback = onReject;
    isVisible.value = true;
  };

  const accept = () => {
    acceptCallback();
    closeConfirmation();
  };

  const reject = () => {
    if (rejectCallback) rejectCallback();
    closeConfirmation();
  };

  const closeConfirmation = () => {
    isVisible.value = false;
  };

  return {
    isVisible,
    message,
    header,
    openConfirmation,
    accept,
    reject,
    closeConfirmation
  };
}
