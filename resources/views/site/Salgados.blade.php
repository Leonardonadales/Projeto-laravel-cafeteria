@extends('site.master.layout')

@section('content')

<main>
        <div class="Principal">
            <section class="hero">
                <header class="hero-conteudo">
                    <span class="destaque">Um bom dia não começa sem um bom café!</span>
                    
                
                    
                    <li class="botão-lista">
                        Coxinha
                    </li>
                    <li class="botão-lista">
                        Croissant com Cream Cheese
                    </li>
                    <li class="botão-lista">
                        Torrada Petrópolis
                    </li>
                    <li class="botão-lista">
                        Pão de Queijo
                    </li>
                    <li class="botão-lista">
                        Pão de Queijo Multigrãos
                    <li class="botão-lista">
                        Baguete Tradicional
                    </li>
                    <li class="botão-lista">
                        Sanduiche de Pernil Suino
                    </li>
                    <li class="botão-lista">
                        Sanduiche de Ratatouille Vegano
                    </li>

                </header>
                <div class="hero-conteudo">
                    <h3 class="destaque">Encontre o seu café para o dia!</h3>
                  
                    <li class="botãoespaço">
                        R$ 5.00
                       <button class="Botão-1" onclick="adicionarItem('Coxinha', 5.00)">+</button>
                       <span id="quantidadeCoxinha">0</span>
                       <button class="Botão-1" onclick="removerItem('Coxinha', 5.00)">-</button>
                   </li>
                   <li class="botãoespaço">
                        R$ 9.99
                       <button class="Botão-1" onclick="adicionarItem('Croissant com Cream Cheese', 9.99)">+</button>
                       <span id="quantidadeCroissantcomCreamCheese">0</span>
                       <button class="Botão-1" onclick="removerItem('Croissant com Cream Cheese' , 9.99)">-</button>
                   </li>
                   <li class="botãoespaço">
                        R$ 9.90
                       <button class="Botão-1" onclick="adicionarItem(' Torrada Petrópolis', 9.90)">+</button>
                       <span id="quantidadeTorradaPetrópolis">0</span>
                       <button class="Botão-1" onclick="removerItem(' Torrada Petrópolis', 9.90)">-</button>
                   </li>
                   <li class="botãoespaço">
                        R$ 3.99
                       <button class="Botão-1" onclick="adicionarItem('Pão de Queijo', 3.99)">+</button>
                       <span id="quantidadePãodeQueijo">0</span>
                       <button class="Botão-1" onclick="removerItem('Pão de Queijo', 3.99)">-</button>
                   </li>
                   <li class="botãoespaço">
                        R$ 4.99
                       <button class="Botão-1" onclick="adicionarItem('Pão de Queijo Multigrãos', 4.99)">+</button>
                       <span id="quantidadePãodeQueijoMultigrãos">0</span>
                       <button class="Botão-1" onclick="removerItem('Pão de Queijo Multigrãos', 4.99)">-</button>
                   </li>
                   <li class="botãoespaço">
                        R$ 6.59
                       <button class="Botão-1" onclick="adicionarItem('Baguete Tradicional', 6.59)">+</button>
                       <span id="quantidadeBagueteTradicional">0</span>
                       <button class="Botão-1" onclick="removerItem('Baguete Tradicional', 6.59)">-</button>
                   </li>
                   <li class="botãoespaço">
                        R$ 8.00
                       <button class="Botão-1" onclick="adicionarItem('Sanduiche de Pernil Suino', 8.00)">+</button>
                       <span id="quantidadeSanduichedePernilSuino">0</span>
                       <button class="Botão-1" onclick="removerItem('Sanduiche de Pernil Suino', 8.00)">-</button>
                   </li>
                   <li class="botãoespaço">
                        R$ 9.49
                       <button class="Botão-1" onclick="adicionarItem('Sanduiche de Ratatouille Vegano', 9.49)">+</button>
                       <span id="quantidadeSanduichedeRatatouilleVegano">0</span>
                       <button class="Botão-1" onclick="removerItem('Sanduiche de Ratatouille Vegano', 9.49)">-</button>
              
                   </li>
                </div>
            </section>
        </div>
        <section class="Cardapio">
            <header class="Receitas-cabeçalho">
                <span class="destaque">Realize seu pedido</span>
                <h2 class="Cardapio-corpo">Carrinho de Compras</h2>
                </header>
            <div>
                <header>
                    <div>
                        <span>Coffee Shop Center</span>
                        <h3></h3>
                    </div>
                </header>
                <ul>
                    <ul id="carrinho">
                    <li>Nenhum item adicionado</li>
                 </ul>
                 <h3></h3>
                 <p id="total">Total: R$ 0.00</p>
                 <button onclick="limparCarrinho()">Cancelar Pedido</button>
                 <button onclick="finalizarPedido()">Finalizar Pedido</button>
            </div>
        </section>
    </main>
    <script>
        var carrinho = [];
        function adicionarItem(item, preco) {
            var quantidadeSpan = document.getElementById("quantidade" + item.replace(/\s/g, ''));
            var quantidade = parseInt(quantidadeSpan.textContent);
            quantidade++;
            quantidadeSpan.textContent = quantidade;

            carrinho.push({item: item, preco: preco});
            atualizarCarrinho();
        }
        function removerItem(item, preco) {
            var quantidadeSpan = document.getElementById("quantidade" + item.replace(/\s/g, ''));
            var quantidade = parseInt(quantidadeSpan.textContent);
            if (quantidade > 0) {
                quantidade--;
                quantidadeSpan.textContent = quantidade;
                for (var i = carrinho.length - 1; i >= 0; i--) {
                    if (carrinho[i].item === item && carrinho[i].preco === preco) {
                        carrinho.splice(i, 1);
                        break;
                    }
                }
                atualizarCarrinho();
            }
        }
        function atualizarCarrinho() {
            var carrinhoElement = document.getElementById("carrinho");
            carrinhoElement.innerHTML = "";
            var total = 0;
            carrinho.forEach(function(item) {
                var li = document.createElement("li");
                li.textContent = item.item + " - R$ " + item.preco.toFixed(2);
                carrinhoElement.appendChild(li);
                total += item.preco;
            });
            document.getElementById("total").textContent = "Total: R$ " + total.toFixed(2);
        }
        function limparCarrinho() {
            carrinho = [];
            var spansQuantidade = document.querySelectorAll('span[id^="quantidade"]');
            spansQuantidade.forEach(function(span) {
                span.textContent = '0';
            });
            atualizarCarrinho();
        }
        function finalizarPedido() {
            if (carrinho.length > 0) {
                
                alert("Pedido finalizado! Redirecionando para a página de pagamento...");
                 window.location.href = "pagina-de-pagamento.html";
            } else {
                alert("Seu carrinho está vazio. Adicione itens antes de finalizar o pedido.");
            }
        }
    </script>

@endsection