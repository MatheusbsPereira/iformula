const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text"),
      picture = body.querySelector(".image")

      sidebar.addEventListener('mouseleave', () => {
        sidebar.classList.add("close")
      });

      sidebar.addEventListener("click", () => {
        sidebar.classList.toggle("close")
      })

      modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark")

        if(body.classList.contains("dark")) {
          modeText.innerText = "Modo claro"
        } else {
          modeText.innerText = "Modo noturno"
        }
      })