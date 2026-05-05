package com.example.fsdp;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.cloud.netflix.eureka.server.EnableEurekaServer;

@SpringBootApplication
@EnableEurekaServer
public class Task15ServerApplication {
    public static void main(String[] args) {
        SpringApplication.run(Task15ServerApplication.class, args);
    }
}
