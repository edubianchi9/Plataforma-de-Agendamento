# API Documentation - Plataforma de Saúde

## CRUD de Profissionais

### Criar um Profissional
- **URL**: `/api/professional`
- **Método**: `POST`
- **Parâmetros de entrada**:
  - `name` (string) - Nome do profissional
  - `specialization` (string) - Especialização do profissional
  - `email` (string) - Email válido
  - `phone` (string) - Telefone de contato
- **Resposta**:
  - Sucesso: `{ "success": true, "message": "Profissional cadastrado com sucesso" }`
  - Erro: `{ "success": false, "message": "Mensagem de erro" }`

### Listar Profissionais
- **URL**: `/api/professional`
- **Método**: `GET`
- **Parâmetros de entrada**: Nenhum
- **Resposta**:
  - `{ "success": true, "data": [ { "id": 1, "name": "Nome", "specialization": "Especialidade", "email": "Email", "phone": "Telefone" } ] }`

### Atualizar Profissional
- **URL**: `/api/professional`
- **Método**: `PUT`
- **Parâmetros de entrada**:
  - `id` (int) - ID do profissional
  - `name` (string) - Nome atualizado
  - `specialization` (string) - Especialização atualizada
  - `email` (string) - Email atualizado
  - `phone` (string) - Telefone atualizado
- **Resposta**:
  - Sucesso: `{ "success": true, "message": "Profissional atualizado com sucesso" }`
  - Erro: `{ "success": false, "message": "Mensagem de erro" }`

### Excluir Profissional
- **URL**: `/api/professional`
- **Método**: `DELETE`
- **Parâmetros de entrada**:
  - `id` (int) - ID do profissional
- **Resposta**:
  - Sucesso: `{ "success": true, "message": "Profissional excluído com sucesso" }`
  - Erro: `{ "success": false, "message": "Mensagem de erro" }`
