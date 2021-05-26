<div class="row">
        <div class="col-md-4">
           <b>Sadrzaj vase korpe:</b> 
           <br><br>
            <table class="table table-striped">
                <tr>
                    <th>Naziv</th>
                    <th>Kolicina</th>
                    <th>Jed. cena</th>
                </tr>
               <?php ispisiTabelu();  ?> 
               <tr >
                   <td>Ukupna cena:</td>
                   <td></td>
                   <td> <b>  <?php echo ukupanRacun();  ?> </b> </td>
               </tr>
            </table>
           
        </div>
        <div class="col-md-6">
            <form method="post" action='php/racun.php'> <!-- pocetak forme -->
            <div class="form-group">
                <label for="inputName">Vaše ime i prezime</label>
                <input type="text" class="form-control" name="ime" id="inputName" placeholder="Unesite Vaše ime i prezime">
            </div>
            <div class="form-group">
                <label for="inputEmail">Vaš email</label>
                <input type="email" class="form-control" name="eMail" id="inputEmail" placeholder="Ovde unesite Vaš email">
            </div>
            <div class="form-group">
                <label for="inputTel">Telefonski broj</label>
                <input type="tel" class="form-control" name="tel" id="inputTel" placeholder="Ovde unesite Vaš telefonski broj">
            </div>
            <div class="form-group">
                <label for="inputSubject">Adresa za isporuku</label>
                <input type="text" class="form-control" name="adresa" id="inputSubject" placeholder="Ovde unesite naslov Vaše poruke">
            </div>
            <div class="form-group">
                <label for="inputText">Posebne napomene</label>
                <textarea class="form-control" name="napomena" rows="3" id="inputText"></textarea>
            </div>
            <input type="hidden" name='ukupnoPara' value="<?php echo ukupanRacun();  ?>">
            <button type="submit" name="kupi" class="btn btn-danger btn-lg btn-block"><i class="far fa-money-bill-alt fa-lg"></i> Kupi!</button>
            </form> <!-- kraj forme -->
        </div> 
</div>
<br><br><br>