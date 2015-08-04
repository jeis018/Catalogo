<?php

/**
 * Clase que realiza las operaciones relacionadas con el carrito de compras.
 *
 * @author hespitia
 */
class Cart {

    public function validateExistence($carProducts, $idProduct) {
        for ($i = 0; $i < count($carProducts); $i++) {
            if ($carProducts[$i] == $idProduct) {
                return 1;
            }
        }
        return 0;
    }

}
