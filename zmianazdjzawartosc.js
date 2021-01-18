let zdj=['Zdjecia_gier/Top_gry/1.jpg',
'Zdjecia_gier/Top_gry/2.jpg',
'Zdjecia_gier/Top_gry/3.jpg',
'Zdjecia_gier/Top_gry/4.jpg',
'Zdjecia_gier/Top_gry/5.jpg']
i=0;
 document.getElementById("przejscie1").innerHTML="<form action='gra.php' method='post'><input type='hidden' name='id' value='"+(i+1)+"'><input type='submit' value='DOWIDZ SIE WIECEJ' id='przejscie'> </form>";
napis0="to jest zdj 0";
napis1="to  jest zdj 1";
napis2="to  jest zdj 2";
napis3="to  jest zdj 3";
napis4="to  jest zdj 4";
function dodaj() 
{
    i++;
    zmiana(0);
}
 function odejmij()
{
    i--;
    zmiana(0); 
}
function zmianaNapisu()
{
    if(i==0)
    {
        document.getElementById("napis").innerHTML=napis0;
    }
    else if (i==1){
        document.getElementById("napis").innerHTML=napis1;
    }
    else if (i==2){
        document.getElementById("napis").innerHTML=napis2;
    }
    else if (i==3){
        document.getElementById("napis").innerHTML=napis3;
    }
    else if (i==4){
        document.getElementById("napis").innerHTML=napis4;
    }
}

function zmiana(x)
    {
        y=x;
        if(y==1)
            {
                i++;
                zmiana(0);

                y=0;
            }
         document.getElementById("przejscie1").innerHTML="<form action='gra.php' method='post'><input type='hidden' name='id' value='"+(i+1)+"'><input type='submit' value='DOWIDZ SIE WIECEJ' id='przejscie'> </form>";
        document.getElementById("obraz1").src=zdj[i];
        if(i>4){
            i=0;
           zmiana(0)

        }
        else if(i<0){
            i=4;
           zmiana(0)

        }
    }
setInterval("zmiana(1)",5000);
setInterval("zmianaNapisu()",100);