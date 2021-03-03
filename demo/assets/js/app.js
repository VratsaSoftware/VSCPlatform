let doc = document;
let navigation = doc.getElementById('navigation');
let toggleNavigationBtn = doc.getElementById('toggleNavigationBtn');

toggleNavigationBtn.addEventListener('click', toggleNavigation);

function toggleNavigation(){
    if(navigation.classList.contains('shrinked')){
        navigation.classList.remove('shrinked');
    }else{
        navigation.classList.add('shrinked');
    }
}