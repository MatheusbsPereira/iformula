import json
from pulp import *
# Lê os dados do arquivo JSON
with open('data.json', 'r') as f:
    data = json.load(f)

# Atribui os dados lidos às variáveis correspondentes
ingredientes = data['ingredientes']
requisitos = data['racao']

# Cria o problema
prob = LpProblem("Dieta mais barata", LpMinimize)

# Cria as variáveis de decisão
ingredient_vars = LpVariable.dicts("Ing", ingredientes, 0)

# Adiciona a função objetivo ao problema
prob += lpSum([ingredientes[i]['custo'] * ingredient_vars[i] for i in ingredientes])

# Adiciona as restrições ao problema
for nutriente in requisitos:
    prob += lpSum([ingredientes[i]['nutrientes'].get(nutriente, 0) * ingredient_vars[i] for i in ingredientes]) >= requisitos[nutriente]['min'], f"min_{nutriente}"
    prob += lpSum([ingredientes[i]['nutrientes'].get(nutriente, 0) * ingredient_vars[i] for i in ingredientes]) <= requisitos[nutriente]['max'], f"max_{nutriente}"

# Resolve o problema
prob.solve()

# Imprime os resultados
print("Status:", LpStatus[prob.status])
for v in prob.variables():
    print(v.name, "=", v.varValue)
print("Custo total dos ingredientes = ", value(prob.objective))
