    const nintendoShow = document.querySelector(".nintendo .page-collection-marque-show");
    const nintendoConsoles = document.querySelectorAll(".nintendo .page-collection-marque-consoles");

    nintendoShow.addEventListener("click", () => {
        nintendoConsoles.forEach((console) => {
            console.classList.toggle("maxify");
        });
    });

     const playstationShow = document.querySelector(".playstation .page-collection-marque-show");
    const playstationConsoles = document.querySelectorAll(".playstation .page-collection-marque-consoles");

    playstationShow.addEventListener("click", () => {
        playstationConsoles.forEach((console) => {
            console.classList.toggle("maxify");
        });
    });

     const xboxShow = document.querySelector(".xbox .page-collection-marque-show");
    const xboxConsoles = document.querySelectorAll(".xbox .page-collection-marque-consoles");

    xboxShow.addEventListener("click", () => {
        xboxConsoles.forEach((console) => {
            console.classList.toggle("maxify");
        });
    });
