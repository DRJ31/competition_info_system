
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

function random() {
    console.log("length:" + arr.length);
    var result1 = document.getElementById("result1");
    var result2 = document.getElementById("result2");
    if(total<1){
        result1.value="Done";
        result2.value="Done";
    }
    else {
        var left = Math.floor(Math.random() * total);
        var right = Math.floor(Math.random() * total);
        result1.value = arr[left][0];
        result2.value = arr1[right][0];
        arr.splice(left, 1);
        arr1.splice(right, 1);
        console.log("left:" + left);
        console.log("right:" + right);
        console.log(total);
        total--;
    }
}
