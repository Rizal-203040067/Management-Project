document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll("section");
    const navLinks = document.querySelectorAll(".nav-link");

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    // Hapus kelas 'active' dari semua link
                    navLinks.forEach((link) =>
                        link.classList.remove("text-purple-700")
                    );

                    // Tambahkan kelas 'active' pada link yang sesuai
                    const activeLink = document.querySelector(
                        `.nav-link[href="#${entry.target.id}"]`
                    );
                    if (activeLink) {
                        activeLink.classList.add("text-purple-700");
                    }
                }
            });
        },
        { threshold: 0.5 }
    );

    sections.forEach((section) => observer.observe(section));
});
