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
  fetch('../simple-shop/module/register.php', {
      method: "POST",
      body: formData
    })
    .then(resp => resp.json())
    .then(resp => {
      document.querySelector('.resolve-msg').innerHTML = resp['msg'].map(singleResp => `<p>${singleResp}</p>`).join('');
      if (resp.status == "ok") {
        document.querySelector('#register-login').value = "";
        document.querySelector('#register-email').value = "";
        document.querySelector('#register-password').value = "";
        document.querySelector('#repeat-register-password').value = "";
        document.querySelector('input[name=register-type-account]:checked').value = "";
        let form = document.querySelector('form')
        form.classList.add('hidden');
        setTimeout(() => {
          form.remove();
        }, 400)
      }
    })
}
document.querySelector('#register-btn') && document.querySelector('#register-btn').addEventListener('click', registerUser);

const loginUser = ev => {
  ev.preventDefault();
  const formData = new FormData();
  let login = document.querySelector('input[name=login]').value;
  let password = document.querySelector('input[name=password]').value;
  formData.append('login', login);
  formData.append('password', password);
  fetch('../simple-shop/module/login.php', {
      method: "POST",
      body: formData
    })
    .then(resp => resp.json())
    .then(resp => {
      document.querySelector('.resolve-msg').innerHTML = resp['errors'].map(single => `<p>${single}</p>`).join(' ');
      if (resp.status == 'redirect') {
        let currentURL = window.location.href;
        let redirectURL = currentURL.replace("login.php", "panel.php");
        window.location.href = redirectURL;
      }
    })
}
document.querySelector('#login-btn') && document.querySelector('#login-btn').addEventListener('click', loginUser);
const setOneColLayout = () => {
     document.querySelectorAll('.single-product').forEach(single => {
         single.classList.add('col-12');
         single.classList.remove('col-6');
     })
 }
const setDoubleColLayout = () => {
     document.querySelectorAll('.single-product').forEach(single => {
         single.classList.remove('col-12');
         single.classList.add('col-6');
     })
 }
document.querySelector('.single-col-btn') && document.querySelector('.single-col-btn').addEventListener('click', setOneColLayout);
document.querySelector('.double-col-btn') && document.querySelector('.double-col-btn').addEventListener('click', setDoubleColLayout);