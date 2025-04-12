import "./bootstrap";

import Swal from "sweetalert2";
window.Swal = Swal;

document.addEventListener("livewire:init", () => {
    Livewire.on("processando-arquivo", () => {
        Swal.fire({
            title: "Processando arquivo",
            text: "Seu arquivo está sendo processado. Aguarde a conclusão.",
            icon: "info",
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            toast: true,
            position: "top-end",
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });
    });

    Livewire.on("processamento-finalizado", () => {
        Swal.fire({
            title: "Processamento finalizado",
            text: "Seu arquivo foi processado com sucesso.",
            icon: "success",
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            toast: true,
            position: "top-end",
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });
    });
});
