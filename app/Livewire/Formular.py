import sys
import json
from pulp import *
import warnings

warnings.filterwarnings("ignore")

dados_json = sys.argv[1]
dados = json.loads(dados_json)

misturador_capacidade = float(dados["misturador"]["capacidade"])

for ingrediente in dados["ingredientes"]:
    dados["ingredientes"][ingrediente]["custo"] = float(dados["ingredientes"][ingrediente]["custo"])

    if dados["ingredientes"][ingrediente]["nutrientes"]:
        for nutriente, valor in dados["ingredientes"][ingrediente]["nutrientes"].items():
            dados["ingredientes"][ingrediente]["nutrientes"][nutriente] = float(valor)
    else:
        # Se não houver nutrientes, crie um dicionário vazio
        dados["ingredientes"][ingrediente]["nutrientes"] = {}


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

    prob += ingredient_vars[ingrediente] >= 0, f"maior_que_zero_{ingrediente}"

# Adiciona a restrição de capacidade do misturador
prob += lpSum([ingredient_vars[i] for i in ingredientes]) == misturador_capacidade, "CapacidadeMisturador"

# Resolve o problema de otimização
prob.solve(PULP_CBC_CMD(fracGap=0, msg=0))

# Exibe os resultados
print("Status:", LpStatus[prob.status])
for v in prob.variables():
    print(v.name, "=", v.varValue)
print("Custo total dos ingredientes = ", value(prob.objective))
