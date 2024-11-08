FROM node:22

# Definir diretório de trabalho
WORKDIR /app

# Copiar package.json e package-lock.json
COPY package*.json ./

# Instalar dependências
RUN npm install

# Instalar Tailwind CSS e suas dependências
RUN npm install axios
RUN npm install -D tailwindcss postcss autoprefixer
RUN npx tailwindcss init

# Copiar o restante dos arquivos
COPY . .

# Expor a porta
EXPOSE 5173

# Comando para iniciar o frontend com binding para 0.0.0.0
CMD ["npm", "run", "dev", "--", "--host", "0.0.0.0"]
