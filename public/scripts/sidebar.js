const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text"),
      picture = body.querySelector(".image")

      toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close")
      })

      picture.addEventListener("click", () => {
        sidebar.classList.toggle("profile")
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