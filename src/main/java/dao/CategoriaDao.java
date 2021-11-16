package dao;

import java.sql.*;
import java.util.*;

import javax.persistence.EntityManager;
import javax.persistence.NoResultException;
import javax.persistence.Query;

import Classes.Categoria;



public class CategoriaDao {

	private Connection con = null; 
	
	public String salvar(Categoria categoria) throws Exception {
		//String retorno;
		try {
			EntityManager em = Conexao.getEntityManager();			
			em.getTransaction().begin();
			em.persist(categoria);
			em.getTransaction().commit();			
			return "Ok";
		} catch(Exception e) {
			throw new Exception("Erro gravando Categoria: "+e.getMessage());
		} 
					
	}
	// alterar
		public String alterar(Categoria categoria) throws Exception {
			try {			
				EntityManager em = Conexao.getEntityManager();			
				em.getTransaction().begin();
				em.merge(categoria);
				em.getTransaction().commit();			
				return "Ok";			
			} catch(Exception e) {
				throw new Exception("Erro gravando Categoria: "+e.getMessage());
			}		
		}
		
		// excluir
		public String deletar(Categoria categoria) throws Exception {
			try {
				EntityManager em = Conexao.getEntityManager();
				Categoria c = em.find(Categoria.class, categoria.getId());
				em.getTransaction().begin();
				em.remove(c);
				em.getTransaction().commit();			
				return "Ok";
			}catch(Exception e) {
				throw new Exception("Erro gravando  Categoria: " + e.getMessage());
			}		
		}	
		
		// consultar
		public List<Categoria> consultar() throws Exception{
			// criar uma var para lista
			EntityManager em = Conexao.getEntityManager();
			Query q = em.createQuery("from Categoria");
			return q.getResultList();				
		}
		
		public Categoria getCategoria(Integer id) {

			 EntityManager em = Conexao.getEntityManager();
		      try {
		    	  Categoria categoria = (Categoria) em.createQuery("SELECT c from Categoria c where c.id = :id").setParameter("id", id).getSingleResult();
		      

		        return categoria;
		      } catch (NoResultException e) {
		            return null;
		      }
		    }
}
