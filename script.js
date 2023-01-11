const bar = document.getElementsByClassName('bar')[0]
const menu = document.getElementsByClassName('menu')[0]

bar.addEventListener('click', () => {
        menu.classList.toggle('active')
})

function showForm() {
        document.getElementById("sign-up-form").style.display = "block"
    }
