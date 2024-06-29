<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap);
    </style>
    <title>IBDHosp</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>

    <body>
        <header>
            <div class="container">
                <a id="a1" href="" style="color: white;">Sobre Nós</a>
                <h1 id="H12"></h1>
                <div class="box">
                    <span> 
                        <a href="index.php"><img src="" alt="logo"></a>
                    </span>
                </div>
                <a id="a2" href="forms.html" style="color: white;">Quero Doar</a>
            </div>
        </header>
        <?php 
        require_once 'config.php';

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $sql_idade = "SELECT idade, COUNT(*) as count FROM dados GROUP BY idade";
        $result_idade = $conn->query($sql_idade);
        $data_idade = [];
        $colors_idade = ["#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A"];
        
        while ($row = $result_idade->fetch_assoc()) {
            $data_idade[] = [
                'value' => intval($row['count']),
                'color' => $colors_idade[count($data_idade)],
                'highlight' => $colors_idade[count($data_idade)],
                'label' => $row['idade']
            ];
        }
        
        $sql_hospital = "SELECT hospital, COUNT(*) as count FROM dados GROUP BY hospital";
        $result_hospital = $conn->query($sql_hospital);
        $data_hospital = [];
        $colors_hospital = ["#46BFBD", "#FDB45C", "#949FB1", "#4D5360"];
        
        while ($row = $result_hospital->fetch_assoc()) {
            $data_hospital[] = [
                'value' => intval($row['count']),
                'color' => $colors_hospital[count($data_hospital)],
                'highlight' => $colors_hospital[count($data_hospital)],
                'label' => $row['hospital']
            ];
        }
        
        $sql_doacao = "SELECT doou, COUNT(*) as count FROM dados GROUP BY doou";
        $result_doacao = $conn->query($sql_doacao);
        $data_doacao = [];
        $colors_doacao = ["#46BFBD", "#F7464A"];
        
        while ($row = $result_doacao ->fetch_assoc()) {
            $data_doacao[] = [
                'value' => intval($row['count']),
                'color' => $colors_doacao[count($data_doacao)],
                'highlight' => $colors_doacao[count($data_doacao)],
                'label' => ($row['doou'] == 'Sim') ? "Sim" : "Não"
            ];
        }
        
        $conn->close();
        ?>
        
        <canvas id="ageChart" width="25" height="12.5"></canvas>
        <canvas id="hospitalChart" width="25" height="12.5"></canvas>
        <canvas id="donationChart" width="25" height="12.5"></canvas>
        
        <script>
            let dataIdade = <?php echo json_encode($data_idade); ?>;
            let ctxAge = document.getElementById("ageChart").getContext("2d");
            new Chart(ctxAge, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: dataIdade.map(item =>item.value),
                        backgroundColor: dataIdade.map(item => item.color),
                        hoverBackgroundColor: dataIdade.map(item => item.highlight)
                    }],
                    labels: dataIdade.map(item => item.label)
                }
            });
        
            let dataHospital = <?php echo json_encode($data_hospital); ?>;
            let ctxHospital = document.getElementById("hospitalChart").getContext("2d");
            new Chart(ctxHospital, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: dataHospital.map(item=>item.value),
                        backgroundColor: dataHospital.map(item => item.color),
                        hoverBackgroundColor: dataHospital.map(item => item.highlight)
                    }],
                    labels: dataHospital.map(item => item.label)
                }
            });
        
            let dataDoacao = <?php echo json_encode($data_doacao); ?>;
            let ctxDoacao = document.getElementById("donationChart").getContext("2d");
            new Chart(ctxDoacao, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: dataDoacao.map(item => item.value),
                        backgroundColor: dataDoacao.map(item => item.color),
                        hoverBackgroundColor: dataDoacao.map(item => item.highlight)
                    }],
                    labels: dataDoacao.map(item => item.label)
                }
            });
        </script>
    </body>
</html>