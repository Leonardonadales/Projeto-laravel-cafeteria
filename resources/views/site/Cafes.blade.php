@extends('site.master.layout')

@section('content')

<main>
        <div class="Principal"> <!-- Divisão da pagina em 3 partes  -->
            <section class="hero">
                <header class="hero-conteudo">
                    <span class="destaque">Um bom dia não começa sem um bom café!</span>
                    <h3 class="Tipo-cafe">Hot Coffee</h3>
                    <li class="botão">
                        Cappuccino
                    </li>
                    <li class="botão-lista">
                        Café Latte
                    </li>
                    <li class="botão-lista">
                        Velvet Cofee
                   </li>
                    <li class="botão-lista">
                        Flat White
                    </li>
                    <li class="botão-lista">
                        Cinnamon Cofee
                    <li class="botão-lista">
                        Expresso
                    </li>
                    <li class="botão-lista">
                        Vanilla Latte
                    </li>
                    <li class="botão-lista">
                        Filter Cofee
                    </li>
                    <li class="botão-lista">
                        Americano
                    </li>
                </header>
                <div class="hero-conteudo">
                    <h3 class="destaque">Encontre o seu café para o dia!</h3>
                    <h4></h4>
                    <li class="botãoespaço">
                        R$ 1.99
                        <button class="Botão-1" onclick="adicionarItem('Cappuccino', 1.99)">+</button>
                        <span id="quantidadeCappuccino">0</span>
                        <button class="Botão-1" onclick="removerItem('Cappuccino', 1.99)">-</button>
                    </li>
                    <li class="botãoespaço">
                        R$ 2.99
                        <button class="Botão-1" onclick="adicionarItem('Café Latte', 2.99)">+</button>
                        <span id="quantidadeCaféLatte">0</span>
                        <button class="Botão-1" onclick="removerItem('Café Latte' , 2.99)">-</button>
                    </li>
                    <li class="botãoespaço">
                        R$ 4.99
                        <button class="Botão-1" onclick="adicionarItem('Velvet Cofee', 4.99)">+</button>
                        <span id="quantidadeVelvetCofee">0</span>
                        <button class="Botão-1" onclick="removerItem('Velvet Cofee', 4.99)">-</button>
                    </li>
                    <li class="botãoespaço">
                        R$ 1.99
                        <button class="Botão-1" onclick="adicionarItem('Flat White', 1.99)">+</button>
                        <span id="quantidadeFlatWhite">0</span>
                        <button class="Botão-1" onclick="removerItem('Flat White', 1.99)">-</button>
                    </li>
                    <li class="botãoespaço">
                        R$ 3.99
                        <button class="Botão-1" onclick="adicionarItem('Cinnamon Cofee', 3.99)">+</button>
                        <span id="quantidadeCinnamonCofee">0</span>
                        <button class="Botão-1" onclick="removerItem('Cinnamon Cofee', 3.99)">-</button>
                    </li>
                    <li class="botãoespaço">
                        R$ 1.99
                        <button class="Botão-1" onclick="adicionarItem('Expresso', 1.99)">+</button>
                        <span id="quantidadeExpresso">0</span>
                        <button class="Botão-1" onclick="removerItem('Expresso', 1.99)">-</button>
                    </li>
                    <li class="botãoespaço">
                        R$ 3.99
                        <button class="Botão-1" onclick="adicionarItem('Vanilla Latte', 3.99)">+</button>
                        <span id="quantidadeVanillaLatte">0</span>
                        <button class="Botão-1" onclick="removerItem('Vanilla Latte', 3.99)">-</button>
                    </li>
                    <li class="botãoespaço">
                        R$ 4.99
                        <button class="Botão-1" onclick="adicionarItem('Filter Cofee', 4.99)">+</button>
                        <span id="quantidadeFilterCofee">0</span>
                        <button class="Botão-1" onclick="removerItem('Filter Cofee', 4.99)">-</button>
               
                    </li>
                    <li class="botãoespaço">
                        R$ 5.99
                        <button class="Botão-1" onclick="adicionarItem('Americano', 5.99)">+</button>
                        <span id="quantidadeAmericano">0</span>
                        <button class="Botão-1" onclick="removerItem('Americano', 5.99)">-</button>
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