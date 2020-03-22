<?php
require_once 'header.php';
?>
    <div class="container pt-5 mb-3">
        <div class="row card bg-black p-3 text-white">
            <p class="text-center">Para entrar em contato com a administração do site utilize os canais abaixo. Nosso horário de atendimento é de segunda a sexta-feira das 10:00 às 18:00.</p>
            <div class="text-center row d-flex justify-content-center">
                <div class="col-md-4 mt-3">
                    <a href="htdiv://api.whatsapp.com/send?1=pt_BR&phone=5598982786113" class="text-white text-decoration-none"><h5><img src="assets/img/whats.png" style="width:30px;"> (98) 98278 - 6113</h5></a>
                </div>
                <div class="col-md-7 mt-3">
                    <form action="enviar.email.php" method="POST" class="mb-5">
                        <div class="form-group">
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <input type="text" name="assunto" id="assunto" class="form-control" placeholder="Assunto">
                        </div>
                        <textarea name="msg" id="msg" class="form-control" cols="30" rows="10" placeholder="Mensagem"></textarea>
                        <input type="submit" value="Enviar" class="btn btn-primary mt-3">
                    </form>
                </div>
            </div>
            <p>
                Se você deseja contratar uma acompanhante, entre em contato diretamente pelo número de telefone que consta no perfil da modelo de sua preferência.  O HARÉM DO BAYMA não é uma agência e sim um site adulto de classificados, dessa forma, não intermediamos a negociação entre usuários e anunciantes, toda e qualquer informação sobre serviços, horários e valores são obtidos com cada garota individualmente.
            </p>
            <img src="assets/img/img.png" title="Harém do Bayma" class="img-fluid w-100 h-100">
        </div>
    </div>
</div>
    
<?php
require_once 'footer.php';