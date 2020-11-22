<!-- <div class="container">
  <h2>Dashboard</h2>

  <?php if (count($registros)==0): ?>

  <p></p>
    <p>Tabela do CDR Vazia!</p>
  <?php else: ?>
    <table class="table table-hover table-stripped dataTables">

      <thead class="thead-red">

	  <th>Chamadas atendidas</th>
    <th>Chamadas não atendidas</th>
    <th>Quantidade de ramais SIP</th>


      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>

	    <td><?php echo $linha['src']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>

    </table>
  <?php endif; ?>
</div> -->

<p></p>
<br></br>
<p></p>
<div class="container">
    <div class="row d-flex">
        <div class="col-sm-12 col-md-4">
            <div style="display: flex;justify-content: space-between; height: 100px;background-color: lightcoral;padding: 15px;">
                <div style="display: flex;align-items: center;justify-content: space-between;">
                    <i class="fa fa-address-book" style="font-size: 55px;color: white;"></i>
                </div>
                <div style="display: flex;flex-direction: column;align-items: flex-end;">
                    <span style="font-size: 25px;color: white; justify-content: flex-end;">0</span>
                    <span style="font-size: 20px;color: white">
                        Chamadas atendidas
                    </span>
                </div>
            </div>
            <div style="color:white;background-color: red;height: 25px;padding-left: 5px">
                <span>Qualquer palavra</span>
            </div>
        </div>

        <div class="col-sm-12 col-md-4">
            <div style="display: flex;justify-content: space-between; height: 100px;background-color: lightblue;padding: 15px;">
                <div style="display: flex;align-items: center;justify-content: space-between;">
                    <i class="fa fa-phone" style="font-size: 55px;color: white;"></i>
                </div>
                <div style="display: flex;flex-direction: column;align-items: flex-end;">
                    <span style="font-size: 25px;color: white; justify-content: flex-end;">0</span>
                    <span style="font-size: 20px;color: white">
                        Chamadas não atendidas
                    </span>
                </div>
            </div>
            <div style="color:white;background-color: blue;height: 25px;padding-left: 5px">
                <span>Qualquer palavra</span>
            </div>
        </div>

        <div class="col-sm-12 col-md-4">
            <div style="display: flex;justify-content: space-between; height: 100px;background-color: lightgreen;padding: 15px;">
                <div style="display: flex;align-items: center;justify-content: space-between;">
                    <i class="fa fa-mobile" style="font-size: 55px;color: white;"></i>
                </div>
                <div style="display: flex;flex-direction: column;align-items: flex-end;">
                    <span style="font-size: 25px;color: white; justify-content: flex-end;">0</span>
                    <span style="font-size: 20px;color: white">
                        Quantidade de ramais
                    </span>
                </div>
            </div>
            <div style="color:white;background-color: green;height: 25px;padding-left: 5px">
                <span>Qualquer palavra</span>
            </div>
        </div>

        <div class="col-sm-12 col-md-4" style="margin-top: 25px">
            <div style="display: flex;justify-content: space-between; height: 100px;background-color: lightslategray;padding: 15px;">
                <div style="display: flex;align-items: center;justify-content: space-between;">
                    <i class="fa fa-users" style="font-size: 55px;color: white;"></i>
                </div>
                <div style="display: flex;flex-direction: column;align-items: flex-end;">
                    <span style="font-size: 25px;color: white; justify-content: flex-end;">0</span>
                    <span style="font-size: 20px;color: white">
                        Chamadas Ocupadas
                    </span>
                </div>
            </div>
            <div style="color:white;background-color: grey;height: 25px;padding-left: 5px">
                <span>Qualquer palavra</span>
            </div>
        </div>
        <div class="col-sm-12 col-md-4" style="margin-top: 25px">
            <div style="display: flex;justify-content: space-between; height: 100px;background-color: lightseagreen;padding: 15px;">
                <div style="display: flex;align-items: center;justify-content: space-between;">
                    <i class="fa fa-database" style="font-size: 55px;color: white;"></i>
                </div>
                <div style="display: flex;flex-direction: column;align-items: flex-end;">
                    <span style="font-size: 25px;color: white; justify-content: flex-end;">0</span>
                    <span style="font-size: 20px;color: white">
                        Dados
                    </span>
                </div>
            </div>
            <div style="color:white;background-color: seagreen;height: 25px;padding-left: 5px">
                <span>Qualquer palavra</span>
            </div>
        </div>
        <div class="col-sm-12 col-md-4" style="margin-top: 25px">
            <div style="display: flex;justify-content: space-between; height: 100px;background-color: indianred;padding: 15px;">
                <div style="display: flex;align-items: center;justify-content: space-between;">
                    <i class="fa fa-file-pdf-o" style="font-size: 55px;color: white;"></i>
                </div>
                <div style="display: flex;flex-direction: column;align-items: flex-end;">
                    <span style="font-size: 25px;color: white; justify-content: flex-end;">0</span>
                    <span style="font-size: 20px;color: white">
                        Horas em Conversação
                    </span>
                </div>
            </div>
            <div style="color:white;background-color: indigo;height: 25px;padding-left: 5px">
                <span>Qualquer palavra</span>
            </div>
        </div>


    </div>
</div>
