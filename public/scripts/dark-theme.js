window.addEventListener("load", function () {
  const toggleSwitch = document.querySelector('.mode');
  const body = document.body;
  const modeText = document.querySelector('.mode-text');

  toggleSwitch.addEventListener('click', function () {
    body.classList.toggle('dark');
    const isDark = body.classList.contains('dark');
    if (isDark == true) {
      modeText.textContent = 'Modo noturno';
      setCookie('theme', 'dark');
    } else {
      modeText.textContent = 'Modo claro';
      setCookie('theme', 'light');
    }
  });
});

function setCookie(name, value) {
  var d = new Date();
  d.setTime(d.getTime() + (365*24*60*60*1000));
  var expires = "expires=" + d.toUTCString();
  document.cookie = name + "=" + value + ";" + expires + ";path=/";
}