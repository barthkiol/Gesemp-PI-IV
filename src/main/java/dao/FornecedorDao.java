package dao;

import java.sql.*;
import java.util.*;

import javax.persistence.EntityManager;
import javax.persistence.NoResultException;
import javax.persistence.Query;

import Classes.Fornecedor;



public class FornecedorDao {

	private Connection con = null; 
	
	public String salvar(Fornecedor fornecedor) throws Exception {
		//String retorno;
		try {
			EntityManager em = Conexao.getEntityManager();			
			em.getTransaction().begin();
			em.persist(fornecedor);
			em.getTransaction().commit();			
			return "Ok";
		} catch(Exception e) {
			throw new Exception("Erro gravando Fornecedor: "+e.getMessage());
		} 
					
	}
	// alterar
		public String alterar(Fornecedor fornecedor) throws Exception {
			try {			
				EntityManager em = Conexao.getEntityManager();			
				em.getTransaction().begin();
				em.merge(fornecedor);
				em.getTransaction().commit();			
				return "Ok";			
			} catch(Exception e) {
				throw new Exception("Erro gravando Fornecedor: "+e.getMessage());
			}		
		}
		
		// excluir
		public String deletar(Fornecedor fornecedor) throws Exception {
			try {
				EntityManager em = Conexao.getEntityManager();
				Fornecedor c = em.find(Fornecedor.class, fornecedor.getId());
				em.getTransaction().begin();
				em.remove(c);
				em.getTransaction().commit();			
				return "Ok";
			}catch(Exception e) {
				throw new Exception("Erro gravando  Fornecedor: " + e.getMessage());
			}		
		}	
		
		// consultar
		public List<Fornecedor> consultar() throws Exception{
			// criar uma var para lista
			EntityManager em = Conexao.getEntityManager();
			Query q = em.createQuery("from Fornecedor");
			return q.getResultList();				
		}
		
		public Fornecedor getFornecedor(Integer id) {

			 EntityManager em = Conexao.getEntityManager();
		      try {
		    	  Fornecedor fornecedor = (Fornecedor) em.createQuery("SELECT c from Fornecedor c where c.id = :id").setParameter("id", id).getSingleResult();
		      

		        return fornecedor;
		      } catch (NoResultException e) {
		            return null;
		      }
		    }
}
