const second = 1000,
    minute = second * 60,
    hour = minute * 60,
    day = hour * 24;
    var now = new Date().getTime();

let countDown = new Date('December 25, 2021 00:00:00 GMT+02:00').getTime();
let countDown2 = new Date('December 25, 2021 00:00:00 GMT-04:00').getTime();

    setInterval(function() {

    
        distance = countDown - now;

        document.getElementById('days').innerText = Math.floor(distance / (day)),
        document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
        document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
        document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
    }, second)


    
    setInterval(function() {

        distance = countDown2 - now;

        document.getElementById('days2').innerText = Math.floor(distance / (day)),
        document.getElementById('hours2').innerText = Math.floor((distance % (day)) / (hour)),
        document.getElementById('minutes2').innerText = Math.floor((distance % (hour)) / (minute)),
        document.getElementById('seconds2').innerText = Math.floor((distance % (minute)) / second);
    }, second)


```

* l'Objet new Date() fonction permetant de créer un nouvel objet Date
[Les objets JavaScript Date](https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/Date)
* La fonction getTime() : Renvoie une valeur numérique en millisececonde de la date renseignée. Peut aussi renvoyer une valeur négative
* La fonction Math.floor renvoie le plus grand entier
```