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
            <a id="a1" href="sobrenós.html">Sobre Nós</a>
            <h1 id="H12"></h1>
            <div class="box">
                <span> 
                    <a href="index.php"><img src="IMAGENS/logo IBDHosp.png" alt="logo" width="280px" height="140px"></a>
                </span>
            </div>
            <a id="a2" href="forms.html">Quero Doar</a>
        </div>
    </header>
 
    <div class="div-slider">
        <ul class="slides-front">
            <input type="radio" name="radio-btn" id="img-1" checked="">
            <li class="slide-container">
                <div class="slide chart-container">
                    <canvas id="ageChart"></canvas>
                </div>
                <div class="nav">
                    <label for="img-3" class="prev">‹</label>
                    <label for="img-2" class="next">›</label>
                </div>
            </li>
       
            <input type="radio" name="radio-btn" id="img-2">
            <li class="slide-container">
                <div class="slide chart-container">
                    <canvas id="hospitalChart"></canvas>
                </div>
                <div class="nav">
                    <label for="img-1" class="prev">‹</label>
                    <label for="img-3" class="next">›</label>
                </div>
            </li>
       
            <input type="radio" name="radio-btn" id="img-3">
            <li class="slide-container">
                <div class="slide chart-container">
                    <canvas id="donationChart"></canvas>
                </div>
                <div class="nav">
                    <label for="img-2" class="prev">‹</label>
                    <label for="img-1" class="next">›</label>
                </div>
            </li>
        </ul>
    </div>
 
    <p id="introducao">A doação de sangue desempenha um papel crucial no sistema de saúde, sendo essencial para salvar vidas e tratar uma ampla variedade de condições médicas. É o sangue doado que salva vidas em situações de emergência, tratamentos médicos, cirurgias e no tratamento de doenças crônicas. Ao se tornar um doador, você está proporcionando esperança e bem-estar a pacientes que precisam de transfusões sanguíneas para continuar lutando. No entanto, muitos hospitais em todo o mundo enfrentam constantemente desafios em relação ao suprimento adequado de sangue para atender às demandas crescentes. Com isso, será criada uma campanha com base em uma pesquisa para divulgar e destacar a importância da doação de sangue, desmistificar possíveis medos e preconceitos associados ao processo e fornecer informações claras sobre o processo de doação e seus benefícios para a comunidade. Serão organizados eventos de doação de sangue em locais estratégicos, como hospitais, e postos comunitários para facilitar a participação e tornar o processo conveniente e acessível a todos. O principal pilar da pesquisa é a comunicação, sem ela não há nada, e com a doação de sangue não é muito diferente. São poucas pessoas que saem dos seus trabalhos e vão doar sangue, mas a nossa ideia é diferente, é aproveitar e valorizar as pessoas que já estão dentro dos Hospitais, que estão acompanhando alguém ou esperando para fazer algum exame por exemplo e aproveitando que elas estarão lá. Por que não aproveitar para doar?</p>

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
    
    while ($row = $result_doacao->fetch_assoc()) {
        $data_doacao[] = [
            'value' => intval($row['count']),
            'color' => $colors_doacao[count($data_doacao)],
            'highlight' => $colors_doacao[count($data_doacao)],
            'label' => ($row['doou'] == 'Sim') ? "Sim" : "Não"
        ];
    }
    
    $conn->close();
    ?>

    <script>
        let dataIdade = <?php echo json_encode($data_idade); ?>;
        let ctxAge = document.getElementById("ageChart").getContext("2d");
        new Chart(ctxAge, {
            type: 'pie',
            data: {
                datasets: [{
                    data: dataIdade.map(item => item.value),
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
                    data: dataHospital.map(item => item.value),
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

    <footer>
        <p>&copy; 2024 IBDHosp. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
