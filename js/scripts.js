const registerUser = (ev) => {
  ev.preventDefault();
  const formData = new FormData();
  let registerLogin = document.querySelector('#register-login').value;
  let registerEmail = document.querySelector('#register-email').value;
  let registerPassword = document.querySelector('#register-password').value;
  let repeatPassword = document.querySelector('#repeat-register-password').value;
  let registerTypeAccount = document.querySelector('input[name=register-type-account]:checked').value;
  formData.append('register-login', registerLogin);
  formData.append('register-email', registerEmail);
  formData.append('register-password', registerPassword);
  formData.append('repeat-register-password', repeatPassword);
  formData.append('register-type-account', registerTypeAccount);
  fetch('../projekt/module/register.php', {
      method: "POST",
      body: formData
    })
    .then(resp => resp.json())
    .then(resp => {
      document.querySelector('.resolve-msg').innerHTML = resp.map(singleResp => `<p>${singleResp}</p>`).join('');
    })
}
document.querySelector('#register-btn').addEventListener('click', registerUser);