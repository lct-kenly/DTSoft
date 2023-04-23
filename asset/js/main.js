// Xử lý sự kiện sidebar
function handleSidebar() {
    const menuItems = document.querySelectorAll('.sidebar__item');

    menuItems.forEach((item) => {
        const menuSub = item.querySelector('.sidebar__menu-sub');
        item.addEventListener('click', function (e) {

            if (this.matches('.active')) {
                item.classList.remove('active')

                if(menuSub) 
                    menuSub.style.maxHeight = 0

            } else if (document.querySelector('.sidebar__item.active')) {

                if(document.querySelector('.sidebar__item.active .sidebar__menu-sub')) 
                    document.querySelector('.sidebar__item.active .sidebar__menu-sub').style.maxHeight = 0

                if(document.querySelector('.sidebar__item.active'))
                    document.querySelector('.sidebar__item.active').classList.remove('active');

                item.classList.add('active');

                if(menuSub)
                    menuSub.style.maxHeight = item.scrollHeight + 'px';
            } else {
                item.classList.add('active');

                if(menuSub)
                    menuSub.style.maxHeight = item.scrollHeight + 'px';
            }
        });
    })
} 

handleSidebar();

// Change content
const changeContent = () => {
    const btnChangeContent = document.querySelectorAll('.btn-change-content');
    const iframe = document.getElementById('iframe');

    btnChangeContent.forEach((item) => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();

            if(document.querySelector('.sidebar__item.active .sidebar__menu-sub')) 
                    document.querySelector('.sidebar__item.active .sidebar__menu-sub').style.maxHeight = 0

            if(document.querySelector('.sidebar__item.active'))
                    document.querySelector('.sidebar__item.active').classList.remove('active');


            if(document.querySelector('.sidebar__menu-sub-item.active'))
                document.querySelector('.sidebar__menu-sub-item.active').classList.remove('active');

            item.parentElement.classList.add('active');

            iframe.src = item.getAttribute('data_content');

        })
    })
}

changeContent();