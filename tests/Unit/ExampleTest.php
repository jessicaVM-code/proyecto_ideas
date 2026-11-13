<?php

test('comprobar una suma', function () {
   $result = 1 + 2;
 
   expect($result)->toBe(3);
});

test('comprobar si una persona es mayor de edad', function(){
    $edad = 16;

    $esMayor = $edad >= 18;

    expect($esMayor)->toBeFalse();
});

test('comprobar la cantidad de productos', function(){
    $productos = ['pan', 'leche', 'azucar'];

    expect($productos)->toHaveCount(3);
});

function calcularDescuento($precio, $descuento){
    return $precio - ($precio * $descuento/100);
}

test('calcular correctamente un descuento', function(){
    $resultado = calcularDescuento(200, 10);

    expect($resultado)->toEqual(180);
});

test('calcular descuento de estudiante', function(){
    $resultado = calcularDescuento(200, 50);

    expect($resultado)->toEqual(100);
});

test('calcular descuento de profesor', function(){
    $resultado = calcularDescuento(200, 0);

    expect($resultado)->toEqual(200);
});

test('calcular diferentes descuentos', function($precio, $descuento, $esperado){
    $resultado = calcularDescuento($precio, $descuento);

    expect($resultado)->toEqual($esperado);
})->with([
    'descuento de 10%' => [200, 10, 180],
    'descuento de 50%' => [200, 50, 100],
    'sin descuento' => [200, 0, 200],
]);

