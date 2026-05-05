package com.example.fsdp.entity;

import jakarta.persistence.*;
import jakarta.validation.constraints.*;

@Entity
@Table(name="product")
public class Product {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @NotBlank(message="Product name cannot be empty")
    @Size(min=3,message="Name must have at least 3 characters")
    private String name;

    @NotNull(message="Price cannot be null")
    @Positive(message="Price must be greater than zero")
    private Double price;

    @NotNull(message="Quantity cannot be null")
    @Min(value=1,message="Quantity must be at least 1")
    private Integer quantity;

    public Product() {}

    public Product(Long id, String name, Double price, Integer quantity) {
        this.id = id;
        this.name = name;
        this.price = price;
        this.quantity = quantity;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public Double getPrice() {
        return price;
    }

    public void setPrice(Double price) {
        this.price = price;
    }

    public Integer getQuantity() {
        return quantity;
    }

    public void setQuantity(Integer quantity) {
        this.quantity = quantity;
    }
}