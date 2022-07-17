<!DOCTYPE html>
<html lang="en">
<?php include_once "ops.php" ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto Escalar</title>

    <style>
        input[type=number] {
            margin: 5px 1px 5px 1px;
            width: 50px;
        }

        h3 {
            margin-top: 10px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <h2>Produto Escalar, Norma e Projeção</h2>
    <form action="" method="get">
        U =
        <input type="number" name="u1">
        <input type="number" name="u2">
        <input type="number" name="u3">
        <br>
        V =
        <input type="number" name="v1">
        <input type="number" name="v2">
        <input type="number" name="v3">
        <br>
        W =
        <input type="number" name="w1">
        <input type="number" name="w2">
        <input type="number" name="w3">
        <br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if (isset($_GET['u1'], $_GET['u2'], $_GET['u3'], $_GET['v1'], $_GET['v2'], $_GET['v3'], $_GET['w1'], $_GET['w2'], $_GET['w3'])) {
        $ops = new Ops(
            $_GET['u1'] . ',' . $_GET['u2'] . ',' . $_GET['u3'],
            $_GET['v1'] . ',' . $_GET['v2'] . ',' . $_GET['v3'],
            $_GET['w1'] . ',' . $_GET['w2'] . ',' . $_GET['w3']
        );
    ?>
        <fieldset>
            <legend>Resultados</legend>
            <div>
                <h3>Produtos Escalares</h3>
                <table>
                    <tr>
                        <th> u * v = </th>
                        <td> <?php echo $ops->produtoEscalar($ops->u, $ops->v) ?></td>
                    </tr>
                    <tr>
                        <th> v * w = </th>
                        <td> <?php echo $ops->produtoEscalar($ops->v, $ops->w) ?></td>
                    </tr>
                    <tr>
                        <th> u * w = </th>
                        <td> <?php echo $ops->produtoEscalar($ops->u, $ops->w) ?></td>
                    </tr>
                </table>
            </div>
            <div>
                <h3>Normas</h3>
                <table>
                    <tr>
                        <th> ||u|| = </th>
                        <td> <?php echo $ops->norma($ops->u) ?></td>
                        <td> <?php if ($ops->norma($ops->u) == 1) echo "Vetor Unitário" ?> </td>
                    </tr>
                    <tr>
                        <th> ||v|| = </th>
                        <td> <?php echo $ops->norma($ops->v) ?></td>
                        <td> <?php if ($ops->norma($ops->v) == 1) echo "Vetor Unitário" ?> </td>
                    </tr>
                    <tr>
                        <th> ||w|| = </th>
                        <td> <?php echo $ops->norma($ops->w) ?></td>
                        <td> <?php if ($ops->norma($ops->w) == 1) echo "Vetor Unitário" ?> </td>
                    </tr>
                </table>
            </div>
            <div>
                <h3>Projeções</h3>
                <table>
                    <tr>
                        <th> Projeção de v em u = </th>
                        <td> <?php echo '(' . implode(", ", $ops->proj($ops->v, $ops->u)) . ')' ?></td>
                    </tr>
                    <tr>
                        <th> projeção de w em u = </th>
                        <td> <?php echo '(' . implode(", ", $ops->proj($ops->w, $ops->u)) . ')' ?></td>
                    </tr>
                    <tr>
                        <th> projeção d e w em v = </th>
                        <td> <?php echo '(' . implode(", ", $ops->proj($ops->w, $ops->v)) . ')' ?></td>
                    </tr>
                </table>
            </div>
        </fieldset>
    <?php } ?>
    <h2>Ornormalização: </h2>
    <p>Inforome uma Base</p>
    <form action="" method="get">
        U1 =
        <input type="number" name="a1" require>
        <input type="number" name="a2" require>
        <input type="number" name="a3" require>
        <br>
        U2 =
        <input type="number" name="b1">
        <input type="number" name="b2">
        <input type="number" name="b3">
        <br>
        U3 =
        <input type="number" name="c1">
        <input type="number" name="c2">
        <input type="number" name="c3">
        <br>
        <input type="submit" value="Enviar">
    </form>

    <fieldset>
        <legend>Resultados</legend>
        <?php
        if (isset($_GET['a1'], $_GET['a2'], $_GET['a3'], $_GET['b1'], $_GET['b2'], $_GET['b3'], $_GET['c1'], $_GET['c2'], $_GET['c3'])) {
            $base = new Ops(
                $_GET['a1'] . ',' . $_GET['a2'] . ',' . $_GET['a3'],
                $_GET['b1'] . ',' . $_GET['b2'] . ',' . $_GET['b3'],
                $_GET['c1'] . ',' . $_GET['c2'] . ',' . $_GET['c3']
            );
            echo $base->orto();
        }
        ?>

    </fieldset>
</body>

</html>