@extends('layouts.app')

@section('content')
<style>
  .container {
    max-width: 100vw;
    display: flex;
    justify-content: center;
  }

  .row {
    width: 80%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 40px;
  }

  .card-produto {
    flex: 1 1 300px;
    border-radius: 4px;
    max-width: 25%;
    box-shadow: 1px 1px 2px black;
    padding: 1px;
    background: #f6f6f6;
  }

  .container-img {
    height: 200px;
  }

  .container-img img {
    width: 100%;
    height: 100%;
    border-radius: 4px;
  }

  .container-info {
    padding: 0px 10px;
    height: 150px;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
  }

  .container-preco {
    padding: 10px;
    border-top: 1px solid #000;
    display: flex;
    justify-content: space-between;
  }

  .container-preco img {
    height: 20px;
  }
</style>
<div class="container">

  <div class="row">

    <a href="{{ route('cards.create') }}" class="btn btn-primary float-right">Novo Cartão</a>
    @foreach($cards as $card)
    <div class="card-produto">
      <div class="container-img">
        <img src="{{ asset('images/cards/'.$card->imagem )}}" alt="">
      </div>
      <div class="container-info">
        <h3>{{ $card->titulo }}</h3>
        <p>{{ $card->descricao }}</p>
        <small>{{ $card->classe }}</small>
      </div>
      <div class="container-preco">
        <span>{{ 'R$ '.$card->valor }}</span>
        <div class="icone">
          <img src="https://cdn.icon-icons.com/icons2/1380/PNG/512/vcsnormal_93488.png" alt="">
        </div>
      </div>
    </div>
    @endforeach
    <!-- <div class="card-produto">
      <div class="container-img">
        <img src="https://uploads.metropoles.com/wp-content/uploads/2020/05/19134444/pannacotta.jpg" alt="">
      </div>
      <div class="container-info">
        <h3>Mousse de morango</h3>
        <p>Uma sobremesa muito saborosa para o pós-refeição</p>
        <small>Sobremesa</small>
      </div>
      <div class="container-preco">
        <span>R$9,50</span>
        <div class="icone">
          <img src="https://cdn.icon-icons.com/icons2/1380/PNG/512/vcsnormal_93488.png" alt="">
        </div>
      </div>
    </div>
    <div class="card-produto">
      <div class="container-img">
        <img src="https://storage.builderall.com//franquias/2/73748/editor-html/5042071.jpg" alt="">
      </div>
      <div class="container-info">
        <h3>Pizza vegana</h3>
        <p>Esse é um dos sabores de pizza mais pedidos por quem é vegano</p>
        <small>Pizzas</small>
      </div>
      <div class="container-preco">
        <span>R$55,00</span>
        <div class="icone">
          <img src="https://cdn.icon-icons.com/icons2/1380/PNG/512/vcsnormal_93488.png" alt="">
        </div>
      </div>
    </div>
    <div class="card-produto">
      <div class="container-img">
        <img src="https://octo.com.br/wp-content/uploads/2020/03/Blog_caipirinha_de_limao.jpg" alt="">
      </div>
      <div class="container-info">
        <h3>Limonada suave</h3>
        <p>A limonada é um suco refrescante e ideal para dias de intenso calor</p>
        <small>Bebida</small>
      </div>
      <div class="container-preco">
        <span>R$5,00</span>
        <div class="icone">
          <img src="https://cdn.icon-icons.com/icons2/1380/PNG/512/vcsnormal_93488.png" alt="">
        </div>
      </div>
    </div>
    <div class="card-produto">
      <div class="container-img">
        <img src="https://www.vidaeacao.com.br/wp-content/uploads/2016/08/hamburguer_batata-870x522.jpg" alt="">
      </div>
      <div class="container-info">
        <h3>Hamburguer Artesanal</h3>
        <p>Excelente hamburguer artesanal feito com a melhor carne Angus</p>
        <small>Lanche</small>
      </div>
      <div class="container-preco">
        <span>R$25,00</span>
        <div class="icone">
          <img src="https://cdn.icon-icons.com/icons2/1380/PNG/512/vcsnormal_93488.png" alt="">
        </div>
      </div>
    </div>
    <div class="card-produto">
      <div class="container-img">
        <img src="https://sindafep.com.br/media/img_noticias/fresh-orange-juice-in-the-glass-on-dark-background.jpg" alt="">
      </div>
      <div class="container-info">
        <h3>Suco de Laranja</h3>
        <p>É um suco bastante popular e que vai bem com qualquer lanche</p>
        <small>Bebidas</small>
      </div>
      <div class="container-preco">
        <span>R$5,00</span>
        <div class="icone">
          <img src="https://cdn.icon-icons.com/icons2/1380/PNG/512/vcsnormal_93488.png" alt="">
        </div>
      </div>
    </div>-->

  </div>
</div>
@endsection