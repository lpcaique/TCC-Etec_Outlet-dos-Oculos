const btn1 = document.getElementById('btn1');
const btn2 = document.getElementById('btn2');
const btn3 = document.getElementById('btn3');
const btn4 = document.getElementById('btn4');
const btn5 = document.getElementById('btn5');

const n1 = document.getElementById('1');
const n2 = document.getElementById('2');
const n3 = document.getElementById('3');
const n4 = document.getElementById('4');
const n5 = document.getElementById('5');

window.onload = ()=>{
    n2.style.display= 'none';
    n3.style.display= 'none';
    n4.style.display= 'none';
    n1.style.display= 'none';
}

btn1.addEventListener('click', ()=>{
    n1.style.display = 'block'
    n2.style.display= 'none';
    n3.style.display= 'none';
    n4.style.display= 'none';
    n5.style.display= 'none';
})

btn2.addEventListener('click', ()=>{
    n2.style.display = 'block'
    n1.style.display= 'none';
    n3.style.display= 'none';
    n4.style.display= 'none';
    n5.style.display= 'none';
})

btn3.addEventListener('click', ()=>{
    n3.style.display = 'block'
    n2.style.display= 'none';
    n1.style.display= 'none';
    n4.style.display= 'none';
    n5.style.display= 'none';
})

btn4.addEventListener('click', ()=>{
    n4.style.display = 'block'
    n2.style.display= 'none';
    n3.style.display= 'none';
    n1.style.display= 'none';
    n5.style.display= 'none';
})

btn5.addEventListener('click', ()=>{
    n5.style.display = 'block'
    n2.style.display= 'none';
    n3.style.display= 'none';
    n1.style.display= 'none';
    n4.style.display= 'none';
})