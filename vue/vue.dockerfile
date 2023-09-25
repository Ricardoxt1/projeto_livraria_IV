FROM node:16 as dev-stage
WORKDIR /app
COPY package*.json ./

# Give permission tu use SUDO
RUN apt-get update && apt-get install -y sudo && \
    usermod -aG sudo node && \
    echo '%sudo ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers


RUN sudo npm install
COPY ./ .

COPY --chown=node:node package.json .
RUN sudo npm install


COPY --chown=node:node . .
USER node

EXPOSE 8080

CMD [ "npm", "run", "serve"]

# FROM node:16 as build-stage
# WORKDIR /app
# COPY package*.json ./
# RUN npm install
# COPY ./ .
# RUN npm run build

# FROM nginx as production-stage
# EXPOSE 3000
# RUN mkdir /app
# COPY nginx.conf /etc/nginx/conf.d/default.conf
# COPY --from=build-stage /app/dist /app
