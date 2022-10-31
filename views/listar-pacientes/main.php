<?php
use Model\Patient;

$patient = new Patient();

$patients = $patient->fetchAll();
?>

<main class="main-lista-patients general">
    <div class="container">
        <div class="content">
            <form action="#" class="search-patient">
            <div class="input">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" name="search" id="search" placeholder="Pesquisar nome do paciente" autocomplete="off">
                <button type="submit">Enviar</button>
            </div>
            </form>

            <div class="patient-list">
            <h1>Lista de pacientes</h1>

            <table>
                <thead>
                <tr>
                    <th>Nome completo</th>
                    <th>Frequência</th>
                    <th>ID</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($patients as $patientData): ?>
                        <tr>
                            <td><?= $patientData['nome'] ?></td>
                            <td>Presente</td>
                            <td><?= $patientData['id'] ?></td>
                            <td>
                                <a href="?page=patient&id=<?= $patientData['id'] ?>">Visualizar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <?php if (!count($patients)): ?>
               <h2 style="text-align: center; margin: 1rem; font-weight: normal;">Não há pacientes cadastrados.</h2>
            <?php endif; ?>
            </div>
        </div>
    </div>
</main>