const bar = document.getElementsByClassName('bar')[0]
const menu = document.getElementsByClassName('menu')[0]

bar.addEventListener('click', () => {
        menu.classList.toggle('active')
})