import sys
import json
from pulp import *
import warnings

warnings.filterwarnings("ignore")

dados_json = sys.argv[1]
dados = json.loads(dados_json)

for ingrediente in dados["ingredientes"]:
    dados["ingredientes"][ingrediente]["custo"] = float(dados["ingredientes"][ingrediente]["custo"])

    for nutriente, valor in dados["ingredientes"][ingrediente]["nutrientes"].items():
        dados["ingredientes"][ingrediente]["nutrientes"][nutriente] = float(valor)

# Extrai os ingredientes e requisitos do JSON
ingredientes = dados["ingredientes"]
requisitos = dados["requisitos"]

# Cria o problema de otimização
prob = LpProblem("Dieta mais barata", LpMinimize)

# Cria variáveis de decisão para os ingredientes
ingredient_vars = LpVariable.dicts("Ing", ingredientes.keys(), 0)

# Adiciona a função objetivo ao problema
prob += lpSum([ingredientes[i]["custo"] * ingredient_vars[i] for i in ingredientes])

# Adiciona as restrições nutricionais ao problema
for nutriente in requisitos:
     prob += lpSum([ingredientes[i]["nutrientes"].get(nutriente, 0) * ingredient_vars[i] for i in ingredientes]) >= requisitos[nutriente]["min"], f"min{nutriente}"
     prob += lpSum([ingredientes[i]["nutrientes"].get(nutriente, 0) * ingredient_vars[i] for i in ingredientes]) <= requisitos[nutriente]["max"], f"max{nutriente}"

# Adiciona as restrições de quantidade mínima e máxima para cada ingrediente
for ingrediente in ingredientes:
     prob += ingredient_vars[ingrediente] >= ingredientes[ingrediente]["min"], f"min{ingrediente}"
     prob += ingredient_vars[ingrediente] <= ingredientes[ingrediente]["max"], f"max{ingrediente}"

# Resolve o problema de otimização
prob.solve(PULP_CBC_CMD(msg=0))


# Exibe os resultados
print("Status:", LpStatus[prob.status])
for v in prob.variables():
    print(v.name, "=", v.varValue)
print("Custo total dos ingredientes = ", value(prob.objective))
