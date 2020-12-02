<?php
function hora($seg)
{
  $hora = floor($seg / 3600);
  $seg -= $hora * 3600;

  $minuto = floor($seg / 60);
  $seg -= $minuto * 60;

  if ($hora < 10)
  $hora = "0" . $hora;
  if ($minuto < 10)
  $minuto = "0" . $minuto;
  if ($seg < 10)
  $seg = "0" . $seg;

  return $hora . ":" . $minuto . ":" . $seg;
}
?>

<p></p>
<br></br>
<p></p>
<div class="container">

  <h2>Dashboards</h2>
    <div class="row d-flex">
      <!-- DIV Chamadas atendidas -->
        <div class="col-sm-12 col-md-4" onclick="window.location.href='../cdr/cdr.php?pesquisa=ANSWERED'" style="cursor:pointer;">
            <div style="display: flex;justify-content: space-between; height: 100px;background-color: #1cb326ab;padding: 15px;">
                <div style="display: flex;align-items: center;justify-content: space-between;">
                    <i class="fa fa-address-book" style="font-size: 55px;color: black;"></i>
                </div>
                <div style="display: flex;flex-direction: column;align-items: flex-end;">
                  <?php
                  $sql_answered_cdr = "SELECT count(*) as TOTAL FROM cdr WHERE disposition ='ANSWERED'";
                  $query_answered_cdr = $con->query($sql_answered_cdr);
                  $row_answered_cdr = $query_answered_cdr->fetch();
                  ?>
                    <span style="font-size: 25px;color: white; justify-content: flex-end;"><?php echo $row_answered_cdr["TOTAL"]?></span>
                    <span style="font-size: 20px;color: white">
                        Chamadas Atendidas
                    </span>
                </div>
            </div>
            <div style="color:white;background-color: #28a745;height: 25px;padding-left: 5px">
                <span></span>
            </div>
        </div>

      <!-- DIV Chamadas não atendidas -->
        <div class="col-sm-12 col-md-4" onclick="window.location.href='../cdr/cdr.php?pesquisa=NO ANSWER'" style="cursor:pointer;">
            <div style="display: flex;justify-content: space-between; height: 100px;background-color: #0b0b0ba1;padding: 15px;">
                <div style="display: flex;align-items: center;justify-content: space-between;">
                    <i class="fa fa-phone" style="font-size: 55px;color: white;"></i>
                </div>
                <div style="display: flex;flex-direction: column;align-items: flex-end;">
                  <?php
                  $sql_noanswer_cdr = "SELECT count(*) as TOTAL FROM cdr WHERE disposition ='NO ANSWER'";
                  $query_noanswer_cdr = $con->query($sql_noanswer_cdr);
                  $row_noanswer_cdr = $query_noanswer_cdr->fetch();
                  ?>
                    <span style="font-size: 25px;color: white; justify-content: flex-end;"><?php echo $row_noanswer_cdr["TOTAL"]?></span>
                    <span style="font-size: 20px;color: white">
                        Chamadas não Atendidas
                    </span>
                </div>
            </div>
            <div style="color:white;background-color: #000;height: 25px;padding-left: 5px">
                <span></span>
            </div>
        </div>

      <!-- DIV Quantidades de Ramais -->
        <div class="col-sm-12 col-md-4">
            <div style="display: flex;justify-content: space-between; height: 100px;background-color: #0c49ff;padding: 15px;">
                <div style="display: flex;align-items: center;justify-content: space-between;">
                    <i class="fa fa-mobile" style="font-size: 55px;color: white;"></i>
                </div>
                <div style="display: flex;flex-direction: column;align-items: flex-end;">
                    <?php
                    $sql_total_ramais = "SELECT COUNT(*) as TOTAL FROM ramais_sip";
                    $query_total_ramais = $con->query($sql_total_ramais);
                    $row_total_ramais = $query_total_ramais->fetch();
                    ?>
                    <span style="font-size: 25px;color: white; justify-content: flex-end;"><?php echo $row_total_ramais["TOTAL"]?></span>
                    <span style="font-size: 20px;color: white">
                        Quantidade de Ramais
                    </span>
                </div>
            </div>
            <div style="color:white;background-color: #151282;height: 25px;padding-left: 5px">
                <span></span>
            </div>
        </div>

      <!-- DIV Chamadas Ocupadas -->
        <div class="col-sm-12 col-md-4" style="margin-top: 25px" onclick="window.location.href='../cdr/cdr.php?pesquisa=BUSY'" style="cursor:pointer;">
            <div style="display: flex;justify-content: space-between; height: 100px;background-color: #ffe118;padding: 15px;">
                <div style="display: flex;align-items: center;justify-content: space-between;">
                    <i class="fa fa-users" style="font-size: 55px;color: white;"></i>
                </div>
                <div style="display: flex;flex-direction: column;align-items: flex-end;">
                  <?php
                  $sql_busy_cdr = "SELECT count(*) as TOTAL FROM cdr WHERE disposition ='BUSY'";
                  $query_busy_cdr = $con->query($sql_busy_cdr);
                  $row_busy_cdr = $query_busy_cdr->fetch();
                  ?>
                    <span style="font-size: 25px;color: white; justify-content: flex-end;"><?php echo $row_busy_cdr["TOTAL"]?></span>
                    <span style="font-size: 20px;color: white">
                        Chamadas Ocupadas
                    </span>
                </div>
            </div>
            <div style="color:white;background-color: #ffc107;height: 25px;padding-left: 5px">
                <span></span>
            </div>
        </div>

        <!-- Chamadas Invalidas -->
        <div class="col-sm-12 col-md-4" style="margin-top: 25px" onclick="window.location.href='../cdr/cdr.php?pesquisa=FAIL'" style="cursor:pointer;">
            <div style="display: flex;justify-content: space-between; height: 100px;background-color: #ca1414;padding: 15px;">
                <div style="display: flex;align-items: center;justify-content: space-between;">
                    <i class="fa fa-database" style="font-size: 55px;color: white;"></i>
                </div>
                <div style="display: flex;flex-direction: column;align-items: flex-end;">
                    <span style="font-size: 25px;color: white; justify-content: flex-end;">0</span>
                    <span style="font-size: 20px;color: white">
                        Chamadas Invalidas
                    </span>
                </div>
            </div>
            <div style="color:white;background-color: red;height: 25px;padding-left: 5px">
                <span></span>
            </div>
        </div>

        <!-- DIV Horas em conversação -->
        <div class="col-sm-12 col-md-4" style="margin-top: 25px">
            <div style="display: flex;justify-content: space-between; height: 100px;background-color: #4b0092c1;padding: 15px;">
                <div style="display: flex;align-items: center;justify-content: space-between;">
                    <i class="fa fa-file-pdf-o" style="font-size: 55px;color: white;"></i>
                </div>
                <div style="display: flex;flex-direction: column;align-items: flex-end;">
                  <?php
                  $sql_count_cdr = "SELECT SUM(billsec) as TOTAL FROM cdr";
                  $query_count_cdr = $con->query($sql_count_cdr);
                  $row_count_cdr = $query_count_cdr->fetch();
                  ?>
                    <span style="font-size: 25px;color: white; justify-content: flex-end;"><?php echo hora($row_count_cdr["TOTAL"]); ?></span>
                    <span style="font-size: 20px;color: white">
                        Tempo Total em Conversação
                    </span>
                </div>
            </div>
            <div style="color:white;background-color: #4b0082;height: 25px;padding-left: 5px">
                <span></span>
            </div>
        </div>


    </div>
</div>
