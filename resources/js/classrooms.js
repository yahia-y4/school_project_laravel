function showClassroomEdit(id,name,capacity,description){
    const classRoom = document.getElementById("edit-page-id")
    if(!classRoom) return
    document.getElementById("name_edit").value=name
    document.getElementById("capacity_edit").value=capacity
    document.getElementById("description_edit").value=description
    classRoom.style.display="flex";



    
}

function hideClassroomEdit(){
        const classRoom = document.getElementById("edit-page-id")
    if(!classRoom) return
    classRoom.style.display="none";


    
}

window.showClassroomEdit=showClassroomEdit
window.hideClassroomEdit=hideClassroomEdit
