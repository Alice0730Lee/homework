// 身分證字號產生器
// 請用function
let id = [];
function creatTWID(){
    // let id = [];
    let letters = ['A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','S','T','U','V','X','Y','W','Z','I','O'];
    let chk = 0;//相加數字做驗證
    let k = 9;//驗證碼乘法用
    let area = document.getElementById("area").value;
    let gender = document.querySelector('input[name="gender"]:checked').value;

    //area
    if(area == "rand"){
        creatTWIDByAll(area);
        // area = parseInt(Math.random()*26+10);
        // id[0] = parseInt(area/10);
        // id[1] = parseInt(area%10);

    }
    else{
        creatTWIDByArea(area);
        // id[0] = parseInt(area/10);
        // id[1] = area%10;
    }

    //gender
    if(gender == "rand"){
        creatTWIDByAll(gender);
        // id[2] = parseInt(Math.random()*2+1);
    }
    else{
        creatTWIDByGender(gender);
        // id[2] = gender;
    }

    //後7碼0-9亂數
    for(let i = 3 ; i < 10 ; i++){
        id[i] = parseInt(Math.random()*10);
    }

    //產出驗證碼
    for(let j = 1 ; j < 10 ; j++){
        chk = chk + id[j]*k;
        k--;
    }
    chk = chk + id[0];
    for(let j2 = 0 ; j2 < 10 ; j2++){
        if ((chk + j2)%10 == 0){
            id[10] = j2;
            break;
        }
    }

    //輸出字母
    let add = id[0].toString()+id[1].toString();
    for(let i = 0 ; i < 26 ; i++){
        if( parseInt(add) == i+10){
            id[0] = letters[i];
            break;
        }
    }

    //轉換後面的數字碼
    [id[1],id[2],id[3],id[4],id[5],id[6],id[7],id[8],id[9]] =
    [id[2],id[3],id[4],id[5],id[6],id[7],id[8],id[9],id[10]];
    id.pop();

    //把陣列轉字串顯示
    let newID = id.toString().replace(/,/g, "");
    document.getElementById("newid").innerHTML = newID;

}

//可以客製化縣市
function creatTWIDByArea(area){
    id[0] = parseInt(area/10);
    id[1] = area%10;
    return id[0],id[1];
}

//可以客製化性別
function creatTWIDByGender(gender){
    id[2] = gender;
}

//全部亂數產生
function creatTWIDByAll (area, gender){
    area = parseInt(Math.random()*26+10);
    id[0] = parseInt(area/10);
    id[1] = parseInt(area%10);
    id[2] = parseInt(Math.random()*2+1);
    return id[0],id[1],id[2];
    
}

