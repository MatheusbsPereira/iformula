const body = document.querySelector("body"),
    sidebar = body.querySelector(".sidebar"),
    picture = body.querySelector(".image");

sidebar.addEventListener("mouseleave", () => {
    clearTimeout(hoverTimeout);
    sidebar.classList.add("close");
});

sidebar.addEventListener("mouseenter", () => {
    hoverTimeout = setTimeout(() => {
        sidebar.classList.remove("close");
    }, 150);
});

sidebar.addEventListener("click", (event) => {
    let targetElement = event.target;
    while (targetElement !== sidebar) {
        if (targetElement.classList.contains("mode")) {
            return;
        }
        targetElement = targetElement.parentNode;
    }
    sidebar.classList.toggle("close");
});
