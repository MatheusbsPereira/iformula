const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      modeSwitch = body.querySelector(".mode"),
      modeText = body.querySelector(".mode-text"),
      picture = body.querySelector(".image")

      sidebar.addEventListener('mouseleave', () => {
        clearTimeout(hoverTimeout);
        sidebar.classList.add('close');
      });

      sidebar.addEventListener('mouseenter', () => {
        hoverTimeout = setTimeout(() => {
          sidebar.classList.remove('close');
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
    
      modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark")

        if(body.classList.contains("dark")) {
          modeText.innerText = "Modo claro"
        } else {
          modeText.innerText = "Modo noturno"
        }
      })