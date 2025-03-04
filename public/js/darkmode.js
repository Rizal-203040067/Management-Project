var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
var themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

// Fungsi untuk menerapkan tema dari localStorage
function applyThemeFromStorage() {
    var filamentTheme = localStorage.getItem("theme") || "light"; // Default light
    if (filamentTheme === "dark") {
        document.documentElement.classList.add("dark");
        themeToggleLightIcon.classList.remove("hidden");
        themeToggleDarkIcon.classList.add("hidden");
    } else {
        document.documentElement.classList.remove("dark");
        themeToggleDarkIcon.classList.remove("hidden");
        themeToggleLightIcon.classList.add("hidden");
    }
}

// Terapkan tema saat halaman dimuat
applyThemeFromStorage();

// Perbarui tema saat tombol diklik
document.getElementById("theme-toggle").addEventListener("click", function () {
    let newTheme = document.documentElement.classList.contains("dark")
        ? "light"
        : "dark";

    // Terapkan tema ke halaman
    document.documentElement.classList.toggle("dark");

    // Simpan tema di localStorage
    localStorage.setItem("theme", newTheme);
    localStorage.setItem("color-theme", newTheme);

    // Terapkan perubahan langsung
    applyThemeFromStorage();
});

// Pantau perubahan theme di localStorage secara real-time
window.addEventListener("storage", function (event) {
    if (event.key === "theme") {
        applyThemeFromStorage();
    }
});
