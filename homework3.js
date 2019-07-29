let roll = document.getElementsByClassName("pic");
let timer = null;
let i  = j = rand = 0;
let goline = [0,1,2,3,4,5,6,8,10,12,14,16,23,22,21,20,19,18,17,15,13,11,9,7];

//創一個亂數
function start(){
    j=0;
    rand = parseInt(Math.random()*24);
    timer = setInterval(running,300);
   }

//加速
function doFast(){
    clearInterval(timer);
    timer = setInterval(running,50);
}

//慢速
function doSlow(){
    j++;
    clearInterval(timer);
    timer = setInterval(running,300);

}

//執行
function running(){
    if(j == 5){
        doFast();
    }
    else if(j == 72){
        doSlow();
    }
    else if(j > 72 && i == rand){
        clearInterval(timer);
    }
    

    if(i >= 24){
        i = 0;
    }
    //背景色移動順序
     roll[goline[i]].setAttribute('style', 'background-color : red');
    i++;j++;
    if(i == 1){
        roll[7].setAttribute('style', 'background-color : white');
    }
    else{
        roll[goline[i-2]].setAttribute('style', 'background-color : white');
    }
}
