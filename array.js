
function searcharr() {
    var num=document.getElementById("searcharrnum").value;
    var long=arr.length;
    var result=document.getElementById("searchresult");
    for(i=0;i<long;i++){
        if(arr[i][1]==num){
            result.value=arr[i][0];
        }
    }

}

