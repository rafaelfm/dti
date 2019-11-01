### Instruções gerais:

> Pode ser utilizada qualquer linguagem.

> Utilizar somente bibliotecas padrão da linguagem escolhida.

> Testes unitários são opcionais.

> A interface do sistema construído deve ser do tipo console.

> O código deve ser executável.


### O que deve ser enviado

> Código construído.

> Premissas assumidas.

> Decisões de projeto.

> Instruções para executar o sistema.


### O problema

Senhor Eduardo é proprietário de um canil em Belo Horizonte, ele trabalha com diversas raças, pequenas e grandes. Eduardo gosta que seus cães estejam sempre arrumados,felizes e cheirosos. No bairro do canil, para realizar o banho nos animais, existem três petshops: Meu Canino Feliz, Vai Rex, e ChowChawgas. Cada um deles cobra preços diferentes para banho em cães pequenos e grandes e o preço pode variar de acordo com o dia da semana.

> Meu Canino Feliz: Está distante 2km do canil. Em dias de semana o banho para
cães pequenos custa R$20,00 e o banho em cães grandes custa R$40,00. Durante
os finais de semana o preço dos banhos é aumentado em 20%.

> Vai Rex: Está localizado na mesma avenida do canil, a 1,7km. O preço do banho
para dias úteis em cães pequenos é R$15,00 e em cães grandes é R$50,00.
Durante os finais de semana o preço para cães pequenos é R$ 20,00 e para os
grandes é R$ 55,00.

> ChowChawgas: Fica a 800m do canil. O preço do banho é o mesmo em todos os dias da semana. Para cães pequenos custa R$30 e para cães grandes R$45,00. Apesar de se importar muito com seus cãezinhos, Eduardo quer gastar o mínimo possível.
Desenvolva uma solução para encontrar o melhor petshop para levar os cães. O melhor petshop será o que oferecer menores preços, em caso de empate o melhor é o mais próximo do canil.


### Entrada:

{data} {quantidade de cães pequenos} {quantidade cães grandes}
Exemplo: 03/08/2018 3 5


### Saída:

Nome do melhor canil e preço total dos banhos.


### Premissas assumidas:

> O parâmetro data deve ser informado entre aspas duplas.

> Quando há taxa do banho aos finais de semana para o petshop, o preço do banho no final de semana será calculado baseado no valor do preço do banho no dia útil +  taxa do banho aos finais de semana.


### Requisitos:

> Ter algum programa capaz de realizar a extração do arquivo.zip em anexo (ex: Winzip, Winrar, etc.)

> Ter o docker-compose instalado.

> Caso não tenha a imagem "php:7.2-cli" será necessário acesso a internet na primeira execução.


### Instruções para executar:

> Realizar extração do arquivo DTI.zip em anexo

> Entrar via terminal/bash na pasta extraída acima.

> Executar o comando: docker-compose up -d --build

> Testes Unitários: Executar o comando: docker run -it dti_dev php testes_unitarios.php

> Exemplo prova: Executar o comando: docker run -it dti_dev php index.php "03/08/2018" 3 5
