// Referensi elemen
const openModalButton = document.getElementById("openSearch");
const modal = document.getElementById("searchBar");
const cancelButton = document.getElementById("cancelBtn");
const deactivateButton = document.getElementById("deactivateBtn");
const backdrop = document.getElementById("backdrop");

// Fungsi untuk membuka modal
openModalButton.addEventListener("click", () => {
    modal.classList.remove("hidden");
});

// Fungsi untuk menutup modal
cancelButton.addEventListener("click", () => {
    modal.classList.add("hidden");
});

// Fungsi untuk keluar modal jika klik backdrop
backdrop.addEventListener("click", () => {
    modal.classList.add("hidden");
});

// Fungsi ketika tombol deactivate ditekan (contoh, Anda bisa menambahkan aksi lain)
deactivateButton.addEventListener("click", () => {
    alert("Account Deactivated");
    modal.classList.add("hidden");
});
