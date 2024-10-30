import { usePage } from "@inertiajs/vue3";

export default function useNotifications () {
    const getMessage = () => usePage().props.flash.message;
    const getError = () => usePage().props.flash.error;

    return { getMessage, getError };
} 