```Mermaid
graph TD
A[Início] --> B[Entrar com o valor]
B --> C{Valor elevado?}
C --> |Sim| D[Não comprar]
C --> |Não| E[Comprar]
D --> F[Fim]
E --> F[Fim]

```