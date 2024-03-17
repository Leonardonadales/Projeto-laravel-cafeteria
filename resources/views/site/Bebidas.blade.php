@extends('site.master.layout')

@section('content')

<main>
        <div class="Principal">
            <section class="hero">
                <header class="hero-conteudo">
                    <span class="destaque">Um bom dia não começa sem um bom café!</span>
                
                    
                    <li class="botão-lista">
                        Suco de Laranja
                    </li>
                    <li class="botão-lista">
                        Chá chai Gelado
                    </li>
                    <li class="botão-lista">
                        Limonada
                    </li>
                    <li class="botão-lista">
                        Chá Preto Gelado
                    </li>
                    <li class="botão-lista">
                        Suco de Morango
                    <li class="botão-lista">
                        Suco Verde
                    </li>
                    <li class="botão-lista">
                        Frappê de Morango
                    </li>
                    <li class="botão-lista">
                        Frappê de Doce de leite
                    </li>

                </header>
                <div class="hero-conteudo">
                    <h3 class="destaque">Encontre o seu café para o dia!</h3>
                    <h4></h4>
                    <li class="botãoespaço">
                        R$ 10.00
                       <button class="Botão-1" onclick="adicionarItem('Suco de Laranja', 10.00)">+</button>
                       <span id="quantidadeSucodeLaranja">0</span>
                       <button class="Botão-1" onclick="removerItem('Suco de Laranja', 10.00)">-</button>
                   </li>
                   <li class="botãoespaço">
                    R$ 12.99
                   <button class="Botão-1" onclick="adicionarItem('Chá chai Gelado', 12.99)">+</button>
                   <span id="quantidadeCháchaiGelado">0</span>
                   <button class="Botão-1" onclick="removerItem('Chá chai Gelado' , 12.99)">-</button>
               </li>
               <li class="botãoespaço">
                    R$ 11.00
                   <button class="Botão-1" onclick="adicionarItem(' Limonada', 11.00)">+</button>
                   <span id="quantidadeLimonada">0</span>
                   <button class="Botão-1" onclick="removerItem(' Limonada', 11.00)">-</button>
               </li>
               <li class="botãoespaço">
                    R$ 13.59
                   <button class="Botão-1" onclick="adicionarItem('Chá Preto Gelado', 13.59)">+</button>
                   <span id="quantidadeCháPretoGelado">0</span>
                   <button class="Botão-1" onclick="removerItem('Chá Preto Gelado', 13.59)">-</button>
               </li>
               <li class="botãoespaço">
                    R$ 12.00
                   <button class="Botão-1" onclick="adicionarItem('Suco de Morango', 12.00)">+</button>
                   <span id="quantidadeSucodeMorango">0</span>
                   <button class="Botão-1" onclick="removerItem('Suco de Morango', 12.00)">-</button>
               </li>
               <li class="botãoespaço">
                    R$ 13.49
                   <button class="Botão-1" onclick="adicionarItem('Suco Verde', 13.49)">+</button>
                   <span id="quantidadeSucoVerde">0</span>
                   <button class="Botão-1" onclick="removerItem('Suco Verde', 13.49)">-</button>
               </li>
               <li class="botãoespaço">
                    R$ 18.00
                   <button class="Botão-1" onclick="adicionarItem('Frappê de Morango', 18.00)">+</button>
                   <span id="quantidadeFrappêdeMorango">0</span>
                   <button class="Botão-1" onclick="removerItem('Frappê de Morango', 18.00)">-</button>
               </li>
               <li class="botãoespaço">
                    R$ 19.00
                   <button class="Botão-1" onclick="adicionarItem('Frappê de Doce de leite', 19.00)">+</button>
                   <span id="quantidadeFrappêdeDocedeleite">0</span>
                   <button class="Botão-1" onclick="removerItem('Frappê de Doce de leite', 19.00)">-</button>
          
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
                // Aqui você pode redirecionar para a página de pagamento ou fazer outras ações necessárias
                alert("Pedido finalizado! Redirecionando para a página de pagamento...");
                 window.location.href = "pagina-de-pagamento.html";
            } else {
                alert("Seu carrinho está vazio. Adicione itens antes de finalizar o pedido.");
            }
        }
    </script>

    @endsection