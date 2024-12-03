    //modal script
function openModal(imageSrc,image_id) {
    if(imageSrc == 'http://localhost/aotest1/public'){
        return 0;
    }
    else{
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("modalImage");
        modal.style.display = "block";
        modalImg.src = imageSrc;
        selected_image_id = image_id;
        document.getElementById("selected_img_id").value = imageSrc.replace("http://localhost/aotest1/public", "");
    }
}
    
function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}
    //delete pop up script
function show_pop_up(){
    document.getElementById("pop_up_div").style.display = "flex";
}

function close_pop_up(){
    document.getElementById("pop_up_div").style.display = "none";
}

var itemsArr = (document.getElementById('fonctions').value).split(',');
function add_item(){
    console.log(itemsArr);
    if(itemsArr.includes(document.getElementById('fonctions').value) == false){
        document.getElementById('items').value = document.getElementById('items').value + ',' + document.getElementById('fonctions').value;
        itemsArr.push(document.getElementById('fonctions').value);
        show_items()
    }
}
function show_items(){
    let myDiv = document.getElementById('fonctionContainer');
    myDiv.innerHTML = '';
    itemsArr.forEach(item => {
        if(item != ''){
            var element = document.createElement('div');
            element.innerHTML = item;
            element.className = 'item';
            element.id = item;
            var button = document.createElement('button');
            button.innerHTML = 'X';
            button.id = 'delete_' + item;
            button.setAttribute('type', 'button');
            button.setAttribute('onclick', 'delete_item("' + item + '")');
            element.appendChild(button);
            document.getElementById('fonctionContainer').appendChild(element);
        }
    });
}
function delete_item(itemId){
    document.getElementById(itemId).remove();
    let index = itemsArr.indexOf(itemId);
    itemsArr.splice(index, 1);
    document.getElementById('items').value = itemsArr.join(',');
    console.log(itemsArr);
    show_items()
}
//show num pop up
function show_num_pop_up(){
    document.getElementById("num_pop").style.display = "flex";
}
function close_num_pop_up(){
    document.getElementById("num_pop").style.display = "none";
}